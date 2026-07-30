#!/bin/sh

set -eu

if [ "$#" -ne 1 ]; then
  echo "Usage: $0 <version>" >&2
  exit 1
fi

VERSION=$1
if ! printf '%s\n' "$VERSION" | grep -Eq '^(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)$'; then
  echo "Version must use stable SemVer format X.Y.Z: $VERSION" >&2
  exit 1
fi

ROOT_DIR=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)

python3 - "$ROOT_DIR" "$VERSION" <<'PY'
import os
import re
import sys
import tempfile

root, version = sys.argv[1:3]


def replace_once(relative_path, pattern, replacement):
    path = os.path.join(root, relative_path)
    with open(path, "r", encoding="utf-8", newline="") as source:
        content = source.read()
    updated, count = re.subn(pattern, replacement, content, count=1)
    if count != 1:
        raise SystemExit("Expected exactly one version field in {}".format(relative_path))
    directory = os.path.dirname(path)
    descriptor, temporary = tempfile.mkstemp(dir=directory)
    try:
        with os.fdopen(descriptor, "w", encoding="utf-8", newline="") as target:
            target.write(updated)
        os.chmod(temporary, os.stat(path).st_mode)
        os.replace(temporary, path)
    finally:
        if os.path.exists(temporary):
            os.unlink(temporary)


replace_once(
    "client/SdkVersion.php",
    r"public const VERSION = '[^']+';",
    "public const VERSION = '{}';".format(version),
)
replace_once(
    "README.md",
    r"(?m)^(?:Releass|Release) \^[^\r\n]+$",
    "Release ^{}".format(version),
)
PY

echo "Updated global-open-sdk-php to $VERSION"
