<template>
    <div>
        <div v-show="loading">
            <h3>Caregando...</h3>
        </div>
        <div>
            <select class="form-control" v-model="yearFilter" @change="loadData">
                <option :value="year" v-for="year in years" :key="year"> {{ year }}</option>
            </select>
        </div>

        <line-report :labels="labels" :datasets="datasets"></line-report>
    </div>
</template>

<script>
    import LineReport from './options-charts/line-reports'

    export default {
        created(){
            this.loadData()
        },
        computed: {
            years() {
                let years = [];
                const currentYear = new Date().getFullYear();

                for(let year = currentYear; year >= (currentYear - 5); year--)
                {
                    years.push(year)
                }

                return years
            }
        },
        data() {
            return {
                yearFilter: new Date().getFullYear(),
                loading: false,
                labels: [],
                datasets: [
                    {
                        label: 'Relatório anual de vendas',
                        data: [],
                        backgroundColor: 'transparent',
                        borderColor: 'orange'
                    }
                ]
            }
        },
        methods:{
            loadData(){
                this.loading = true
                const params = { year: this.yearFilter }
                axios.get('/api/reports/months', { params })
                    .then(response => {
                        this.labels = response.data.labels
                        this.datasets[0].data = response.data.values
                        console.log(response)
                    }).catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        },
        components: {
            LineReport
        }
    }
</script>

<style scoped>

</style>
