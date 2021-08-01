programa de prueba como postulación al cargo de desarrollador

Desafío 1:



Visualiza las siguientes estructuras de tablas.

Invoice (id, date, user_id, seller_id, type)
Product (id, invoice_id, name, quantity, price)
En base a esas estructuras, genera utilizando Eloquent, las consultas para obtener la siguiente información:

Obtener precio total de la factura.
	
	-$total = Product::where('invoice_id', $ivoice_id)->sum(DB::raw('products.quantity * products.price'));
	Donde $ivoice_id seria el numero de factura que el usuario solicite

Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.
	
	-$total = DB::table('products')->where('quantity','>',100)->distinct()->get('invoice_id');

Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.
	
	-$total = DB::table('products')->where(DB::raw('products.quantity * products.price'),'>',1000000)->get('name');



Desafío 2:



Indica paso a paso los comandos para una instalación básica de Laravel que me permita ver la página principal (recuerda describir qué hace cada comando).
	Como requerimientos previos se deberia tener instalado PHP y Composer en ausencia de docker.
	Desde una terminal bash o zsh ejecutar los siguientes comandos:
	1. Composer create-project laravel/laravel *nombre del proyecto*
		
		-Este comando hace el llamado a composer, que es un administrador de dependencias de PHP y nos creará un proyecto laravel bautizado con el nombre que le indicamos. Desde este punto ya tendremos toda nuestra aplicacion creada.
	
	2. php artisan serve
		
		-Con este comando estaremos iniciando el servidor de pruebas que proporciona laravel donde nos mostrará la pagina que trae por defecto en la misma dirección que nos indica en la terminal y que nos demuestra que todo se instaló correctamente.
	
	3. google-chrome/firefox 127.0.0.1:8000(opcional)
		
		-Desde la misma terminal en una ventana nueva al ejecutar este comando con el navegador de nuestra preferencia y colocando la dirección que nos dá el servidor de laravel iniciará el navegador y nos mostrará la pagina por defecto.

Desafío 3:



Respecto a la estructura de datos del desafío 1, agrega a "Invoice" un campo "total" y escribe un Observador (Observer) en el que cada vez que se inserter un registro en la tabla "Product", aumente el valor de "total" de la tabla "Invoice".

	Haciendo uso de las herramientas de Laravel, usando el comando "php artisan make:observer *nombre del observador* --model=*Nuestro modelo a observar*" se creará nuestro observador. Ahora debemos registrarlo en nuestro archivo AppServiceProvider.php y en la funcion "boot()" agregar lo siguiente: 
	*nuestro modelo*::observe(*nuestro observador*::class);
	Yendo al archivo de nuestro observador agregamos las siguientes lineas de codigo en la funcion "created()"

	$invoice = Invoice::where('id',$product->invoice_id)->first();
	Buscamos la factura que posee el id del producto ingresado

        $total = Product::where('invoice_id', $product->invoice_id)->sum(DB::raw('products.quantity * products.price'));
	Calculamos el total de la venta realizada de ese producto (cantiad*precio)

	$invoice->total = $total;
	Asignamos el total calculado a nuestro modelo de factura previamente solicitado

        $invoice->save();
	Guardamos nuestro modelo modificado el cual tambien modificara el registro de la base de datos


Desafío 4:



Explícanos ¿qué es "Laravel Jetstream"? y ¿qué permite "Livewire" a los programadores?

	-Laravel Jestream es un starter kit creado para este framework. Un starter kit es un molde de aplicación que tiene las funciones que comummente se requieren en un sitio web. Jetstream incluye una pagina de inicio con un sistema de inicios de sesion y un "dashboard" que es una pagina donde interactuará el usuario ya registrado y con sesión iniciada.
	-Si bien Jetstream incluye muchas herramientas en el back-end, tambien ofrece herramientas para el front-end. Tal es el caso de Livewire que proporciona muchas facilidades para desarrollar una interfaz mas atractiva y mas personalizable que bootstrap por ejemplo.



