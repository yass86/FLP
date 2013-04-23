
function validarUsuario(cc,ape,nom,mail,con)
{
     var cont =0;
     var correcto = true;
     if(cc.length<1)
         cont++;
     if(ape =="")
         cont++;
     if(nom.length<1)
         cont++;
     if(mail.length<1)
         cont++;
     if(con.length<1)
         cont++;              
     if(cont>0)
         correcto = false;     
     return correcto;     
}
function validarNumero(num)
{
    
}
function validarSiNumero(numero){
   var ret = true;
    if (!/^([0-9])*$/.test(numero))
        {
            alert("El valor " + numero + " no es un nÃºmero de documento valido\nNo debe contener puntos ni comas");
            ret = false;
        }
      
      return ret;
  }
  function valEmail(valor){ 
      re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/ ;
      if(!re.exec(valor))    {  
          alert("El campo email no tiene el formato correcto");
          return false;   
      }else
      {        
          return true;  
      } 
  }

function validar(cc,ape,nom,mail,con)
{
    var texto="";
     var cont =0;
     var correcto = true;
     if(cc.length<1)
         {
         cont++;
         texto+="Numero de documento no debe ser vacio\n";
         }
     if(ape.length<1)
         {
         cont++;
         texto+="Nombre no debe estar vacio\n";
         }
     if(nom.length<1)
         {
         cont++;
         texto+="Apellido no debe estar vacio\n";
         }
     if(mail.length<1)
         {
         cont++;
         texto+="Campo telefono no debe estar vacio\n";
         }
     if(con.length<1)
         {
         cont++;
         texto+="Campo mail no debe estar vacio\n";
         }         
     if(cont>0)
         {
         correcto = false;
         alert(texto);
         }             
     return correcto;     
}