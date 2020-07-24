function MoreContent() {
	$('.content-post').removeClass('preview-content');
	$('.hide-content').hide();
}

function Video(id_video) {
    $('#frame-video').attr('src','https://www.youtube.com/embed/'+id_video+'?autoplay=1&rel=0');
    $('#modal-video').show();
}

$('.close-video').click(function () {
    $('#frame-video').attr('src',' ');
    $('.modal').hide();
})

$('.fechar').click(function(){
	$('.modal-live').fadeOut('');
	$('#live').attr('src',' ');
})

$('.fechar').click(function(){
	$('#sucesso-cadastro').fadeOut('');
  $('#vemmorar').fadeOut('');
})

$(document).ready(function(){
  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

   $('.telefones').mask(SPMaskBehavior, spOptions);
   $('#telefone_cadastro').mask(SPMaskBehavior, spOptions);
});


$('#parana_mapa').click(function(){
  $('#parana').fadeIn('');
})
$('#saopaulo_mapa').click(function(){
  $('#saopaulo').fadeIn('');
})
$('#minasgerais_mapa').click(function(){
  $('#minasgerais').fadeIn('');
})
$('#espiritosanto_mapa').click(function(){
  $('#espiritosanto').fadeIn('');
})
$('#goias_mapa').click(function(){
  $('#goias').fadeIn('');
})
$('#sergipe_mapa').click(function(){
  $('#sergipe').fadeIn('');
})
$('#pernambuco_mapa').click(function(){
  $('#pernambuco').fadeIn('');
})
$('#maranhao_mapa').click(function(){
  $('#maranhao').fadeIn('');
})

$('.fechando').click(function(){
  $('.modal_mapa').fadeOut('');
})


//Função para checar se campo e-mail está correto
function checkMail(mail){
    var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
    if(typeof(mail) == "string"){
        if(er.test(mail)){ return true; }
    }else if(typeof(mail) == "object"){
            if(er.test(mail.value)){ 
                return true; 
            }
    }else{
            return false;
     }
}


function EnviaCadastro(local) {
    errors = 0;
    if($('#email_'+local).val()=="" || checkMail($('#email_'+local).val())!=true){
        $('#email_'+local).addClass('error-form');
        $('#email_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#email_'+local).addClass('valide-form');
        $('#email_'+local).removeClass('error-form');
    }

    if($('#nome_'+local).val()==""){
        $('#nome_'+local).addClass('error-form');
        $('#nome_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#nome_'+local).addClass('valide-form');
        $('#nome_'+local).removeClass('error-form');
    }

    if($('#telefone_'+local).val()==""){
        $('#telefone_'+local).addClass('error-form');
        $('#telefone_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#telefone_'+local).addClass('valide-form');
        $('#telefone_'+local).removeClass('error-form');
    }

    if($('#login_'+local).val()==""){
        $('#login_'+local).addClass('error-form');
        $('#login_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#login_'+local).addClass('valide-form');
        $('#login_'+local).removeClass('error-form');
    }

    if($('#senha_'+local).val()==""){
        $('#senha_'+local).addClass('error-form');
        $('#senha_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#senha_'+local).addClass('valide-form');
        $('#senha_'+local).removeClass('error-form');
    }

    if($('#profissao_'+local).val()==""){
        $('#profissao_'+local).addClass('error-form');
        $('#profissao_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#profissao_'+local).addClass('valide-form');
        $('#profissao_'+local).removeClass('error-form');
    }

  if (errors == 0) {
          var dados = $('#form_'+local).serialize();

          //Captura do cookie
          var utm_source = readCookie('utm_source');
          var utm_medium = readCookie('utm_medium');
          var utm_campaign = readCookie('utm_campaign');
          var gclid = readCookie('gclid');

          if (utm_source) {
            var midia = utm_source+' > '+utm_medium+' > '+utm_campaign;
          }else if (gclid){
            var midia = 'google/cpc';
          }else{
            var midia = 'Acesso Direto';
          }

          console.log(midia);

          $.ajax({
            type: 'POST',
            data: {dados},
            url:'/wp-content/themes/Abrainc/cadastro.php', 
              success: function(retorno){
                $('#sucesso-'+local).show();
                $('#form_'+local+' input').val('');
                $('#form_'+local+' input').removeClass('valide-form');

                /*window.location.href = "/indicadores-publicacoes/";*/
              }
          });
      } 
}

function RecuperaSenha(local) {
    errors = 0;
    if($('#email_'+local).val()=="" || checkMail($('#email_'+local).val())!=true){
        $('#email_'+local).addClass('error-form');
        $('#email_'+local).removeClass('valide-form');
        errors++;
    } else {
        $('#email_'+local).addClass('valide-form');
        $('#email_'+local).removeClass('error-form');
    }

  if (errors == 0) {
          var dados = $('#form_'+local).serialize();

          //Captura do cookie
          var utm_source = readCookie('utm_source');
          var utm_medium = readCookie('utm_medium');
          var utm_campaign = readCookie('utm_campaign');
          var gclid = readCookie('gclid');

          if (utm_source) {
            var midia = utm_source+' > '+utm_medium+' > '+utm_campaign;
          }else if (gclid){
            var midia = 'google/cpc';
          }else{
            var midia = 'Acesso Direto';
          }

          console.log(midia);

          $.ajax({
            type: 'POST',
            data: dados,
            url:'/wp-content/themes/Abrainc/consulta.php', 
              success: function(retorno){
                if (retorno == 'não encontrado') {
                  alert('E-mail não encontrado');
                }else{
                  $('#sucesso-recuperar').show();
                  $('#form_'+local+' input.input-form').val('');
                  $('#form_'+local+' input').removeClass('valide-form');
                }  
              }
          });
      } 
}

// Cookies
function createCookie(name, value, days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toGMTString();
  } else var expires = "";

  document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

/* palestrantes */
function AbreModalPalestras(id_modal) {
    $('#palestrantes-'+id_modal).fadeIn('300');
};


$(function(){
    $('.fechar').click(function(){
        $('.palestras').fadeOut('300');
    })
});

$(window).scroll(function() { 
    var scroll = $(window).scrollTop();

        if (scroll > 450) {
            $('.btn-inscricao').css('opacity', '1');
        }else{
            $('.btn-inscricao').css('opacity', '0');
        }
});

function checarScroll() {
    var margem = 10;
    var posicao = $(document).scrollTop() + window.innerHeight;
    var footertop = $('.footer').offset().top;            
    var meiodapagina = window.innerHeight / 10;            
    var maximo = footertop + meiodapagina - margem;

    if (posicao < maximo) {
        $('#fixed').css('bottom', meiodapagina + 'px');
    } else {                
        $('#fixed').css('bottom', (margem + (posicao - footertop)) + 'px');
    }
}
$(document).ready(checarScroll);
$(document).scroll(checarScroll);

$(function () {
    $('.btn-inscricao').click(function () {
        $("html, body").animate({scrollTop: $('#inscricao').position().top+250}, 1000);
        
    })
})