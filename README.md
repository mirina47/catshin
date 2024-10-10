# Веб-игра «Catshin Impact». 
Основной идеей данной игры является возможность скрещивания имеющихся котов с целью получения кота с более редким геном. В основе лежит сюжет, согласно которому инопланетные коты стремятся захватить наш мир, увеличивая свою армию.

Основная идея данного проекта — генерация котов. У пользователя есть возможность покупать котиков и скрещивать уже существующих для получения новых. У каждого кота есть свой определенный набор генов, и при скрещивании, с некоторой вероятностью, может появиться котик с редким геном. Гены котика влияют на такие параметры как: цвет шерсти, цвет глаз, форма ушей, форма хвоста и так далее. 

Коты в игре бесполые, поэтому скрещивать можно двух любых котов. У кота, получившегося в результате скрещивания, набор активных генов будет выбираться с некоторой вероятностью. В зависимости от активных генов котика генерируется его изображение. Также котик будет сохранять весь набор генов и первого родителя, и второго родителя. Следовательно, при дальнейшем скрещивании этого кота с другими сородичами, у его потомка могут активизироваться пассивные гены любого предка. Таким образом, чем больше набор генов котика, тем он ценнее.

Поскольку главная идея игры заключается в генерации котов и системе наследования генов, к этому этапу разработки было установлено несколько требований:
1. Создать объекты «Cat» и «Kitty», созданные для представления стандартных котов (без генома) и котов, созданных путём скрещивания соответственно;
2. Создать функцию, которая создает изображение кота, путём наслаивания изображений с определенными частями тела кота;
3. Внутри объектов добавить поле, хранящее идентификатор кота, при чем идентификаторы экземпляров объектов «Cat» и «Kitty» должны выдаваться так, что «Cat» и «Kitty» считается объектом одного типа.

Мини-игра: ежедневно пользователю предоставляется возможность запустить «молитву», с помощью которой пользователь может выиграть либо нового кота в свою коллекцию, либо аксессуары (вероятности выпадения кота или аксессуара отличаются).  

Требования для интерфейса веб-игры:
1. Дизайн каждой страницы сайта должен быть выполнен в одном стиле;
2. Все изображения на сайте должны быть авторскими;
3. На сайте должна быть реализована возможность регистрации и входа в свою учётную запись.




Для веб-игры «Catshin Impact» были реализованы три основные веб-страницы. «Главная» — index.html, которая является главной страницей для новых пользователей. «Молитва» — wish.html, где пользователь ежедневно может в случайном порядке получить новый аксессуар или нового кота в свою коллекцию. «Лаборатория» — laboratory.html, которая представляет собой личный кабинет, где находятся каталог со всеми котами конкретного пользователя и лаборатория для скрещивания имеющихся сторон. При реализации страниц были использованы язык гипертекстовой разметки HTML5, формальный язык описания внешнего вида документа CSS и язык программирования JavaScript.
## Страница «Главная»
Главную страницу можно представить в виде нескольких разделов.
Первый раздел представлен на рисунке 1. На нем расположены следующие компоненты:
*	навигация, с помощью которой пользователь может перейти на страницы «Молитва» и «Лаборатория», а также по нажатию на иконку пользователя открыть форму регистрации для создания своего аккаунта;
*	нажатие на кнопку «Play» запускает стартовый ролик с предысторией главных героев — зеленого инопланетного и рыжего домашнего котов. Данная функция реализована с помощью JS.
  
![Рисунок 1. Первый раздел страницы «Главная»](/screenshots/screen1.png)

На следующих разделах показаны элементы веб-игры, которые могут привлечь пользователя. Рисунок 2.

![Рисунок 2. Разделы страницы «Главная»](/screenshots/screen2.png)

Последний раздел представлен на рисунке 3. Здесь находится кнопка «Нажать», благодаря которой заинтересовавшийся игрой пользователь может перейти на страницу с формой регистрации.

![Рисунок 3. Последний раздел страницы «Главная»](/screenshots/screen3.png)


## Страница «Молитва»
Данная страница представлена на рисунке 4. На веб-странице расположены следующие компоненты: навигация, с помощью которой можно перейти на страницы «Главная» и «Лаборатория», а также кнопка «Молитва», при нажатии на которую пользователь получит аксессуар или кота.

![Рисунок 4. Страница «Молитва»](/screenshots/screen4.png)


## Страница «Лаборатория»
Данную страницу также можно представить в виде нескольких разделов. 
Первый раздел представлен на рисунке 5. В нем представлены следующие компоненты:
*	кнопка «Главная», которая ведет на главную страницу веб-сайта;
*	кнопка «Выйти из аккаунта», при нажатии на которую пользователь может выйти из своего аккаунта;
*	кнопка «Молитва», с помощью пользователь может перейти на страницу с возможностью получения аксессуара или кота;
*	список с количеством котов и аксессуаров пользователя;
*	любимый кот пользователя с понравившимся аксессуаром, выбранный в разделе «Каталог».
  
![Рисунок 5. Страница «Молитва»](/screenshots/screen5.png)
 
Второй раздел представлен на рисунке 6. В нем находится каталог с имеющимися у пользователя котами и аксессуарами. С помощью кнопок «Назад» и «Вперед» игрок может переключаться между объектами. Нажатие на определенного кота позволяет выставить его в первый раздел личного кабинета, а нажатие на аксессуар надевает его на этого кота. Отображение каталога реализовано с использованием JavaScript, получение котов конкретного пользователя возможно благодаря PHP.

![Рисунок 6. Страница «Молитва»](/screenshots/screen6.png)

В третьем разделе (рисунок 7) находится основная идея игры — возможность скрещивания двух имеющихся котов по выбору пользователя. Получившийся кот добавляется в каталог и может быть использован в дальнейшем скрещивании. Процесс скрещивания реализован на PHP.

![Рисунок 7. Страница «Молитва»](/screenshots/screen7.png)
