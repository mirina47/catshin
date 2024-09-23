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
