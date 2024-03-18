<x-app-layout>
    <div class="">
        <div class="w-full mx-auto px-4">
            <h2 class="text-2xl dark:text-white font-semibold text-center mt-8">Resultados do Teste</h2>
            <p class="text-lg text-center text-gray-500 dark:text-gray-200 mb-4">Resultados para o Grupo de
                Entrevistados ID: 12<br>Total de Participantes: 32</p>
            <div class="grid md:flex md:flex-col-reverse md:gap-4">
                <div
                    class="bg-gray-100 shdc-shadow-2 rounded-lg overflow-hidden flex flex-wrap items-center justify-center">
                    <div class="border-t border-gray-200 w-full"></div>
                    <div class="bg-gray-100 flex justify-center text-center items-center md:order-first pt-6"
                         style="height: 300px; width: 300px;">
                        <canvas id="radarChart" class=""></canvas>
                    </div>
                    </div>
                </div>
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
            labels: @json($data['labels']),
            datasets: [{
                label: 'Disposição Média da Turma',
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
