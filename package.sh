plugin_basename=$(basename $(pwd))
version=$1
#clean up
rm -rf /tmp/$plugin_basename;
rm /tmp/$plugin_basename-$1.zip;


cd ..;
cp -r $plugin_basename /tmp;

cd -;
cd /tmp;
rm /tmp/$plugin_basename/sftp-config.json;
rm -rf /tmp/$plugin_basename/vendor/diviframework/update-checker/.git;
zip -r9 $plugin_basename-$version.zip $plugin_basename -x *.git* -x *.sh -x *.json -x *.xml -x *.dist -x *.lock -x *tests* -x *bin* -x *Gruntfile.js* -x *.gitignore* -x *.distignore* -x *.editorconf*;
rm -rf /tmp/$plugin_basename;
