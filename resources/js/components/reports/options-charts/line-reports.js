import { Line } from 'vue-chartjs'

export default {
    name: "Months.vue",
    extends: Line,
    props: {
        labels: {
            type: Array,
            required: true
        },
        datasets: {
            type: Array,
            required: true
        }
    },
    mounted() {
        this.loadChart()
    },
    methods: {
        loadChart(){
            this.renderChart({
                labels: this.labels,
                datasets: this.datasets
            }, { response: true, maintainAspectRatio: false })
        }
    },
    watch: {
        labels() {
            this.loadChart()
        }
    }
}
