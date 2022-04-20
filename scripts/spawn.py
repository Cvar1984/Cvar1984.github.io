#!/bin/python
# -*- coding: utf-8 -*-
from    subprocess import Popen, PIPE, STDOUT
import  time
import  os
import  sys
 
exploit = './spawn'
cmds    = sys.argv[1]
 
p = Popen([exploit, ''], stdout=PIPE, stdin=PIPE, stderr=STDOUT)
print(str(p.communicate(cmds)[0]))
