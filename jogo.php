<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Jogo adivinhe o número</title>
  </head>

  <body>
        <h1>Adivinhe o número</h1>

        <p>Selecione um número aleatório entre 1 e 100. Você tem 10 chances. Nós lhe diremos se seu palpite foi muito alto ou muito baixo.</p>

        <div class="form">
        <label for="campoPalpite">Digite seu palpite: </label><input type="text" id="campoPalpite" class="campoPalpite">
        <input type="submit" value="Enviar palpite" class="envioPalpite">
        </div>

        <div class="resultadoParas">
        <p class="palpites"></p>
        <p class="ultimoResultado"></p>
        <p class="baixoOuAlto"></p>
        </div>
        <a class="btn btn-outline-dark" href="index.php" role="button">Index</a>
    </body>

        <script>
            var numeroAleatorio = Math.floor(Math.random() * 100) + 1;
            var palpites = document.querySelector('.palpites');
            var ultimoResultado = document.querySelector('.ultimoResultado');
            var baixoOuAlto = document.querySelector('.baixoOuAlto');
            var envioPalpite = document.querySelector('.envioPalpite');
            var campoPalpite = document.querySelector('.campoPalpite');
            var contagemPalpites = 1;
            var botaoReinicio;
            campoPalpite.focus();

            function conferirPalpite() {
                var palpiteUsuario = Number(campoPalpite.value);
                if(contagemPalpites === 1) {
                palpites.textContent = 'Palpites anteriores: ';
                }
                palpites.textContent += palpiteUsuario + ' ';
                if(palpiteUsuario === numeroAleatorio) {
                ultimoResultado.textContent = 'Parabéns! Você acertou!';
                ultimoResultado.style.backgroundColor = 'lightgreen';
                baixoOuAlto.textContent = '';
                configFimDeJogo();
                } else if(contagemPalpites === 10) {
                ultimoResultado.textContent = '!!!FIM DE JOGO!!!';
                baixoOuAlto.textContent = '';
                configFimDeJogo();
                } else {
                ultimoResultado.textContent = 'Errado!';
                ultimoResultado.style.backgroundColor = 'darkred';
                if(palpiteUsuario < numeroAleatorio) {
                    baixoOuAlto.textContent = 'Seu palpite foi muito baixo!';
                } else if(palpiteUsuario > numeroAleatorio) {
                    baixoOuAlto.textContent = 'Seu palpite foi muito alto!';
                }
                }
                contagemPalpites++;
                campoPalpite.value = '';
                campoPalpite.focus();
            }
            envioPalpite.addEventListener('click', conferirPalpite);
            
            function configFimDeJogo() {
                campoPalpite.disabled = true;
                envioPalpite.disabled = true;
                botaoReinicio = document.createElement('button');
                botaoReinicio.textContent = 'Iniciar novo jogo';
                document.body.appendChild(botaoReinicio);
                botaoReinicio.addEventListener('click', reiniciarJogo);
            }

            function reiniciarJogo() {
                contagemPalpites = 1;
                var reiniciarParas = document.querySelectorAll('.resultadoParas p');
                for(var i = 0 ; i < reiniciarParas.length ; i++) {
                reiniciarParas[i].textContent = '';
                }
                botaoReinicio.parentNode.removeChild(botaoReinicio);
                campoPalpite.disabled = false;
                envioPalpite.disabled = false;
                campoPalpite.value = '';
                campoPalpite.focus();
                ultimoResultado.style.backgroundColor = 'white';
                numeroAleatorio = Math.floor(Math.random() * 100) + 1;
            }

        </script>
        
</html>
