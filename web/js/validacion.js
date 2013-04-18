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
function validar(cc,ape,nom,mail,con)
{
     var cont =0;
     var correcto = true;
     if(cc.length<1)
         cont++;
     if(ape.length<1)
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