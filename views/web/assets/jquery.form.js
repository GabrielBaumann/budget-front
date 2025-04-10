// $(function () {
//     //ajax form
//     $("form:not('.ajax_off')").submit(function (e) {
//         e.preventDefault();
//         var form = $(this);
//         var load = $(".ajax_load");
//         var flashClass = "ajax_response";
//         var flash = $("." + flashClass);

//         form.ajaxSubmit({
//             url: form.attr("action"),
//             type: "POST",
//             dataType: "json",
//             beforeSend: function () {
//                 load.fadeIn(200).css("display", "flex");
//             },
//             success: function (response) {
//                 //redirect
//                 if (response.redirect) {
//                     window.location.href = response.redirect;
//                     return;
//                 }

//                 //message
//                 if (response.message) {
//                     // Remove mensagens anteriores
//                     $('.' + flashClass).remove();
                    
//                     // Cria a mensagem estilizada
//                     var successMessage = `
//                     <div class="${flashClass} fixed top-4 right-4 z-50 max-w-sm w-full">
//                         <div class="p-4 rounded-2xl bg-green-100 text-green-800 border border-green-300 shadow-md flex items-start gap-2 animate-fade-in">
//                             <svg class="w-6 h-6 mt-1 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
//                                 <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
//                             </svg>
//                             <div>
//                                 <strong class="block">Sucesso!</strong>
//                                 <span>${response.message}</span>
//                             </div>
//                         </div>
//                     </div>`;
                    
//                     // Adiciona ao body (melhor para position:fixed)
//                     $('body').append(successMessage);
                    
//                     // Remove após 5 segundos
//                     // setTimeout(function() {
//                     //     $('.' + flashClass).fadeOut(3000, function() {
//                     //         $(this).remove();
//                     //     });
//                     // }, 1000);
//                 }
//             },
//             complete: function () {
//                 load.fadeOut(200);

//                 if (form.data("reset") === true) {
//                     form.trigger("reset");
//                 }
//             }
//         });
//     })
// });

// Antigo
$(function () {
    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                }

                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                        
                    } else {
                        form.append("<div class='" + flashClass + "'>" + response.message + "</div>")
                        .find("." + flashClass).effect("bounce", 300); 
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                load.fadeOut(200);

                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });

    })
});