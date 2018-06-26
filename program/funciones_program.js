function OpenAWindow( PageToLoad, WinName, Width, Height ) {
		xposition=0; yposition=0;
		Args = "width=" + Width + ",height=" + Height + "," 
		+ "location=0,menubar=0,resizable=0,scrollbars=0,status=1,titlebar=0,toolbar=0,hotkeys=0"
		window.open( PageToLoad,WinName,Args );
	}

function OpenAWindowInfo( PageToLoad, WinName, Width, Height ) {
		xposition=0; yposition=0;
		Args = "width=" + Width + ",height=" + Height + "," 
		+ "location=0,menubar=0,resizable=0,scrollbars=0,status=1,titlebar=0,toolbar=0,hotkeys=0"
		window.open( PageToLoad,WinName,Args );
	}

function OpenAWindowInfo2( PageToLoad, WinName, Width, Height ) {
		xposition=0; yposition=0;
		Args = "width=" + Width + ",height=" + Height + "," 
		+ "location=0,menubar=0,resizable=0,scrollbars=1,status=1,titlebar=0,toolbar=0,hotkeys=0"
		window.open( PageToLoad,WinName,Args );
	}

function OpenAWindowGrafica( PageToLoad, WinName, Width, Height ) {
		xposition=0; yposition=0;
		Args = "width=" + Width + ",height=" + Height + "," 
		+ "location=0,menubar=0,resizable=1,scrollbars=1,status=1,titlebar=0,toolbar=0,hotkeys=0"
		window.open( PageToLoad,WinName,Args );
	}


function cambia_color1(objeto, color){
  var celdas = null;
  celdas = objeto.getElementsByTagName('td');
  tamanno = celdas.length;
  for(i=0;i<tamanno;i++) {
    celdas[i].setAttribute('bgcolor', color, 0);
  }
}

function cambia_color2(objeto, color){
  var celdas = null;
  celdas = objeto.getElementsByTagName('td');
  tamanno = celdas.length;
  for(i=0;i<tamanno;i++) {
    celdas[i].setAttribute('bgcolor', color, 0);
  }
}

function CambiarColorIn(el, bg) {
	if (el.style) {
		el.style.cursor = 'hand';
		el.style.backgroundColor = bg;
		el.children.tags('A')[0].style.color = '#ffffff';
	}
}

function CambiarColorOut(el, bg) {
	if (el.style) {
		el.style.cursor = 'default';
		el.style.backgroundColor = bg;
	}
}

function CambiarColorClick(el, bg) {
	if(event.srcElement.tagName=='TD') {
		el.style.backgroundColor = bg;
		el.children.tags('A')[0].click();
	}
}
<!-- ********************************************************************** -->

function valida_campo_str(xcampo,xmensaje) {
   if (xcampo.value == '') 
    {
      alert (xmensaje);
      xcampo.focus();        
      return false;
    }
   else { return true; }
}

function valida_campo_int(xcampo, xmensaje1, xmensaje2) {
   if (xcampo.value == '') 
    {
      alert (xmensaje1);
      xcampo.value='0';
      xcampo.focus();        
      return false;
    }
   else { 
          if (isNaN(xcampo.value)) {
	       alert (xmensaje2);
               xcampo.value='0';
               xcampo.focus();        
               return false; }
          else
               return true;
        }
}

 function validadatos(xforma) {
    if (!valida_campo_str(xforma.newpassword,'Olvido Introducir la Contraseña')) return;
    if (!valida_campo_str(xforma.newpassword2,'Olvido Introducir la Validación de la Contraseña')) return;
    if (xforma.newpassword.value == xforma.newpassword2.value) {
        xforma.submit()
    }
    else {
           alert('Los datos de la Contraseña no coinciden.\nIntentelo nuevamente, Por favor.');
           xforma.newpassword.value = '';
           xforma.newpassword2.value = '';
           return false;
         }
 }


function valida_busqueda_sorteo_01(xforma) {

   if (!valida_campo_int(xforma.xnumsorteo,'Olvido introducir el Nº del Sorteo','Introduzca un número valido, Por Favor!!')) return;
   xforma.submit();

 }


function confirmar_submit_dbmelate(xform, mensaje) {
  if (!valida_campo_int(xform.xsorteo,'Olvido introducir el Nº del Sorteo','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat1,'Olvido introducir el 1° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat2,'Olvido introducir el 2° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat3,'Olvido introducir el 3° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat4,'Olvido introducir el 4° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat5,'Olvido introducir el 5° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat6,'Olvido introducir el 6° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (confirm(mensaje)) {
     xform.submit();
  }

}

function confirmar_submit_dbrevancha(xform, mensaje) {
  if (!valida_campo_int(xform.xsorteoR,'Olvido introducir el Nº del Sorteo','Introduzca un número valido, Por Favor!!')) return;  
  if (!valida_campo_int(xform.xnat1,'Olvido introducir el 1° Número Natural','Introduzca un número valido, Por Favor!!')) return;  
  if (confirm(mensaje)) {
     xform.submit();
  }

}

<!-- ********************************************************************** -->
function confirmar_submit_eliminar(xform, mensaje) {

  if (confirm(mensaje)) {
     xform.accion.value = '3';
     xform.submit();
  }

}


function confirmar_submit(xform, mensaje) {

  if (confirm(mensaje)) {
     xform.submit();
  }

}

function confirmar_submit_paquetes(xform, mensaje) {  
  
  if (confirm(mensaje)) {
     if (paquetes.cambioSelect.value == '1') {
       for(i=0; i<paquetes.oSelect.length; i++) {
         paquetes.oSelect.options[i].selected = 'selected';
       }
     }
     xform.submit();
  }

}

<!-- ********************************************************************** -->

function MM_swapImgRestore() {
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() {
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_findObj(n, d) {
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() {
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

<!-- ********************************************************************** -->