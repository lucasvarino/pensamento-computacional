<div>
        <div class="w-full max-w-3xl mx-auto px-4">
            <p>
            Olá,<br>
            Parabéns por concluir o seu Teste de Perfil de Jogador! <br>
            Abaixo, você encontra o relatório com suas respostas e a análise do seu perfil. <br>
            Este relatório traz uma visão personalizada de como você se envolve em diferentes atividades,
            destacando suas motivações, estilos predominantes e sugestões para aprimorar seu engajamento. <br>
            Obrigado pela sua participação!
            </p>
            <h2 class="text-2xl dark:text-white font-semibold text-center mt-8">Resultados do Teste de Perfil de Jogador</h2>
            <div class="grid md:flex md:flex-col-reverse md:gap-4">
                <div class="bg-gray-100 shdc-shadow-2 rounded-lg overflow-hidden flex flex-wrap items-center justify-center">
                    <div class="border-t border-gray-200 w-full"></div>
                    <div class="grid gap-3 p-6">
                        @foreach($results as $result)
                            <div class="flex items-center">
                                <h3 class="text-lg font-bold">{{ $result['group'] }}: {{ $result['value'] }}%</h3>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ $result['description'] }}
                            </p>
                            <div class="border-t border-gray-200 w-full"></div>
                        @endforeach
                </div>
            </div>
            <p>
                Atenciosamente, <br>
                Equipe Game Persona <br>
                Projeto orientado por Prof. Eduardo Barrére<br>
                DCC / ICE / UFJF<br>
                Contato:<br>
                projeto.perfiljogador@ufjf.br<br>
                Site:<br>
                https://perfiljogador.repesq.ufjf.br<br>
                ------------------------------<br>
                Este relatório pode conter informações confidenciais.  <br>
                Se você recebeu esta mensagem por engano, por favor informe para projeto.perfiljogador@ufjf.br e apague-a.
        </p>
        </div>
</div>