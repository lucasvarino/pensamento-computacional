<x-app-layout>
    <div>
        <div class="w-full max-w-3xl mx-auto px-4">
            <h2 class="text-2xl dark:text-white font-semibold text-center mt-8">Resultados do Teste</h2>
            <p class="text-lg text-center text-gray-500 dark:text-gray-200 mb-4">Resultados para o Grupo de
                Entrevistados ID: 12<br>Total de Participantes: 32</p>
            <div class="grid md:flex md:flex-col-reverse md:gap-4">
                <div class="bg-gray-100 shdc-shadow-2 rounded-lg overflow-hidden flex flex-wrap items-center justify-center">
                    <div class="border-t border-gray-200 w-full"></div>
                    <div class="bg-gray-100 flex justify-center text-center items-center md:order-first pt-6"
                         style="height: 300px; width: 300px;">
                        <canvas id="radarChart" class=""></canvas>
                    </div>
                    <div class="grid gap-4 p-6">
                        <div class="flex items-center">
                            <h3 class="text-lg font-bold">Achiever: 54%</h3>
                        </div>
                        <p class="text-sm text-gray-500">
                            Reforçam seu status através da demonstração daquilo que possuem, podendo ou não estar
                            relacionado com sua evolução na narrativa do universo virtual ou habilidades. Seu objetivo
                            é, efetivamente, ser admirado e invejado pelos demais em função de suas posses (independente
                            de como as tenha obtido).
                        </p>
                        <div class="border-t border-gray-200 w-full"></div>
                        <div class="flex items-center">
                            <h3 class="text-lg font-bold">Explorer: 54.79%</h3>
                        </div>
                        <p class="text-sm text-gray-500">
                            Moldam seus comportamentos com o objetivo de ir atrás do desconhecido, de descobrir lugares,
                            atividades, segredos que as demais personagens não conhecem e, com isso, obter status
                            perante o grupo em função de algo que sabem ou podem ensinar aos demais.
                        </p>
                        <p class="text-sm text-gray-500">
                            Para engajar usuários do tipo explorador no ambiente virtual, deve-se sempre deixar algo em
                            aberto, trabalhar com rumores e oferecer pequenos pedaços de informação, como um
                            quebra-cabeças, que acabam por se juntarem ao longo do tempo..
                        </p>
                        <div class="border-t border-gray-200 w-full"></div>
                        <div class="flex items-center">
                            <h3 class="text-lg font-bold">Socializer: 53.96%</h3>
                        </div>
                        <p class="text-sm text-gray-500">
                            Buscam no universo virtual o desenvolvimento das relações humanas, sejam elas dependentes
                            (onde o usuário busca alguém para guiá-lo e atuar como líder ou exemplo - ou de liderança -
                            quando o usuário busca um grupo de dependentes para servir de exemplo ou líder na narrativa.
                        </p>
                        <div class="border-t border-gray-200 w-full"></div>
                        <div class="flex items-center">
                            <h3 class="text-lg font-bold">Killer: 36.67%</h3>
                        </div>
                        <p class="text-sm text-gray-500">Sua expectativa está, basicamente, em ser melhor que o outro,
                            em vencer quaisquer disputas de poder e rankings que exibam sua capacidade para as demais
                            personagens. Além da clara exibição pela vitória, usuários com perfil lutador tendem a não
                            visarem univamente a glória momentânea, mas também em exibi-la publicamente.</p>
                    </div>
                </div>
                <div class="md:w-1/4">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const ctx = document.getElementById('radarChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Achiever', 'Explorer', 'Socializer', 'Killer'],
            datasets: [{
                label: 'Tendência',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            locale: 'pt-BR',
            scales: {
                r: {
                    suggestedMin: 0,
                    suggestedMax: 50
                }
            }
        }
    });
    Chart.defaults.global.defaultFontColor = "#fff";
</script>
