# VIM Cheat sheet

## Global

open help for keyword

`:help keyword`

open file

`:o file`

save file as

`:saveas file`

close current pane

`:close`

open man page for word under the cursor

`K`

## Insert mode - inserting/appending text

insert before the cursor

``i``


insert at the beginning of the line

``I``


insert (append) after the cursor
```a```

insert (append) at the end of the line
```A```

append (open) a new line below the current line
```o```

append (open) a new line above the current line
``O``

insert (append) at the end of the word
```ea```

exit insert mode
```Esc```


https://vim.rtorr.com/

## Cursor movement
move cursor left

`h`


move cursor down

`j`


move cursor up

`k`


move cursor right

`l`


move to top of screen

`H`


move to middle of screen

`M`


move to bottom of screen

`L`


jump forwards to the start of a word

`w`


jump forwards to the start of a word (words can contain punctuation)

`W`


jump forwards to the end of a word

`e`


jump forwards to the end of a word (words can contain punctuation)

`E`


jump backwards to the start of a word

`b`


jump backwards to the start of a word (words can contain punctuation)

`B`


move to matching character (default supported pairs: '()', '{}', '[]' use <code>:h matchpairs</code> in vim for more info)

`%`


jump to the start of the line

`0`


jump to the first non-blank character of the line

`^`


jump to the end of the line

`$`

```Tip Prefix a cursor movement command with a number to repeat it. For example, 4j moves down 4 lines.```

jump to the last non-blank character of the line

`g_`


go to the first line of the document

`gg`


go to the last line of the document

`G`


go to line 5

`5G`


jump to next occurrence of character x

`fx`


jump to before next occurrence of character x

`tx`


jump to next paragraph (or function/block, when editing code)

`}`


jump to previous paragraph (or function/block, when editing code)

`{`


center cursor on screen

`zz`


move back one full screen

`Ctrl`+ `b`


move forward one full screen

`Ctrl`+ `f`


move forward 1/2 a screen

`Ctrl`+ `d`


move back 1/2 a screen

`Ctrl`+ `u`
