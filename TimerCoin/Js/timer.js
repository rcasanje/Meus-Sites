var hora = new Number();
var minuto = new Number();
var segundo = new Number();
var contador;
var continuar = new Boolean();

var hora = 1;
var minuto = 1;
var segundo = 0;
var continuar = true;

function iniciar(){
		if (hora == 0 && minuto == 0 && segundo == 0){
			continuar = false;
			tempo.innerText = "Acabou";
			var notification = new Notification("Título", {
				icon: 'http://i.stack.imgur.com/dmHl0.png',
				body: "Texto da notificação"
			});
			notification.onclick = function() {
				window.open("http://stackoverflow.com");
			}
		} else if (minuto <= 0 && segundo <= 0){
			hora -= 1;	
			minuto = 59;
			segundo = 59;
		} else if (segundo <= 0){
			segundo = 59;
			minuto -= 1;
		}
		
		if(continuar == true){
			setTimeout('iniciar();', 1000);
			contador = hora + ":" + minuto + ":" + segundo; 
			tempo.innerText = contador;
		}
		segundo -= 1;
}

var dados = <?php echo json_encode
alert();

function fechando() {
    alert("	Valeu, falow.");
}