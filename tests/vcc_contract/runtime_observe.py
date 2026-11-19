import json,pathlib,re,subprocess,sys
root=pathlib.Path.cwd();req=json.load(sys.stdin);names=set(req['models'])
for target in req['operations']:
 op=target.split(' ',1)[1].split('/requestBody',1)[0].split('/responses',1)[0].rsplit('/',1)[1];names.add('Alipay'+op[0].upper()+op[1:]+'Request')
classes={}
for directory in ['model','request','response']:
 for path in (root/directory).rglob('*.php'):
  if path.stem in names:
   text=path.read_text();namespace=re.search(r'namespace\s+([^;]+)',text).group(1);classes[path.stem]=namespace+'\\'+path.stem
assert set(classes)==names,(classes,names)
p=subprocess.run(['php',str(pathlib.Path(__file__).with_name('observe.php'))],input=json.dumps({'classes':classes}),capture_output=True,text=True,check=False)
assert p.returncode==0,p.stderr[-4000:]+p.stdout[-1000:]
actual=json.loads(p.stdout);actual['models']={k:v for k,v in actual['models'].items() if k in req['models']};print(json.dumps(actual))
