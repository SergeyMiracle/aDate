aDate
=====

Snippet aDate

Опции:

&date - обязательный параметр, дата - любой плейсхолдер: [+createdon+], [+pub_date+] и так далее

&alterDate - дата как и date, только будет использоваться если &date содержит пустое значение.

&tpl - чанк или @CODE; По умолчанию - '@CODE:[+day+].[+month+].[+year+] [+hour+].[+minute+].[+second+]'

Доступны плейсхолдеры: [+day+] [+month+] [+year+] [+hour+] [+minute+] [+second+]

&lang - язык, для форматирования названий месяцев года. Доступно: ru, en, ua. По умолчанию: ru.

&Uppercase - формат вывода месяцев года:

      0 - по умолчанию, выводит все в нижнем регистре
      1 - выводит с первой буквой в верхнем регистре
      2 - все буквы в верхнем регистре
      
&monthFormat - формат месяца:

      1 - числовое значение месяца (01 - 12)
      2 - название месяца (январь)
      3 - короткое название месяца (янв)
