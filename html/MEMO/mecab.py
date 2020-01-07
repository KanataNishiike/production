#!/usr/local/src/pyenv/shims/python
# -*- coding: utf_8 -*-

import sys
import MeCab
import re

mecab = MeCab.Tagger("-Ochasen")
mecab.parse('')#空でパースする必要がある
node=mecab.parseToNode('私は大学を辞めたい')

while node :
    origin=node.surface#もとの単語を代入
    kana=node.feature.split(",")[7]#読み仮名を代入

    #正規表現で漢字と一致するかをチェック
    pattern = "[一-龥]"
    matchOB = re.match(pattern , origin)

    #originが空のとき、漢字以外の時はふりがなを振る必要がないのでそのまま出力する
    if origin != "" and matchOB:
        print("<ruby><rb>{0}</rb><rt>{1}</rt></ruby>".format(origin,kana),end="")
    else :
        print(origin)

    node=node.next
