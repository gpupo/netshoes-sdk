#!/bin/bash
# @Date:   2016-06-24T09:45:16-03:00
# @Modified at 2016-06-24T09:45:37-03:00
# {release_id}

vendor/bin/phpunit --testdox | grep -vi php |  sed "s/.*\[/-&/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\NetshoesSdk\\/### /g' > var/logs/testdox.txt

cat Resources/doc/main.md Resources/doc/QA.md  Resources/doc/thanks.md Resources/doc/install.md Resources/doc/console.md \
Resources/doc/links.md Resources/doc/dev.md var/logs/testdox.txt > README.md;

cat Resources/doc/libraries-list.md | sed 's/  * / | /g' | sed 's/0 / | /g' >> README.md;
