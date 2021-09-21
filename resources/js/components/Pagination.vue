<template>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item" :class="{'disabled' : activePage <= 1 }">
                <span class="page-link" @click="getNumberPage(--activePage)">Indietro</span>
            </li>
            <!-- vecchia versione paginatore
            <li v-for="number in lastPage" :key="number" @click="getNumberPage(number)" class="page-item" :class="{'active' : number ===  currentPage}">
                <span class="page-link">{{ number }}</span>
            </li>
            -->

            <li v-for="numPage in getStartPage" :key="numPage" @click="getNumberPage(numPage)" class="page-item" :class="{'active' : numPage ===  activePage}">
                <span class="page-link">{{ numPage }}</span>
            </li>

            <!--
            <li class="page-item active">
                <span class="page-link">{{ activePage }}</span>
            </li>
            -->

            <li v-for="numPage in getLastPage" :key="numPage" @click="getNumberPage(numPage)" class="page-item">
                <span class="page-link">{{ numPage }}</span>
            </li>

            <li class="page-item" :class="{ 'disabled' : activePage >= lastPage}">
                <span class="page-link" @click="getNumberPage(++activePage)">Avanti</span>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'Pagination',
    props: {
        lastPage: Number,
        currentPage: Number
    },
    data(){
        return {
            activePage: (function(){
                return this?.currentPage || 1;
            }()),
        }
    },
    methods: {
        getNumberPage(value){
            // controllo di sforamento pagine
            if(value < 1 || value > this.lastPage) return null;
            // impostiamo il valore di activePage con l'ultima pagina selezionata
            this.activePage = value;
            // se la stessa pagina viene ricliccata, ritoriamo null
            if(value === this.currentPage) return null;
            // eseguiamo l'emit al componente genitore se i controlli sono stati superati
            this.$emit('numPage', value);
        }
    },
    computed: {
        getStartPage: function(){
            /*
            let sum = this.activePage - 5;
            let result = sum > 1 ? sum : 1;
            return result;
            */
           let pages = [];

           for(let i = 1; i <= this.activePage; i++){
               if(pages.length >= 5){
                   pages.shift();
               }
               pages.push(i);
           }

           return pages;

        },
        getLastPage: function(){
            let pages = [];
            let i = this.activePage + 1;

           for(; i <= this.lastPage; i++){
               pages.push(i);
           }
            //console.log(pages.slice(0, 5));
           return pages.slice(0, 5);
        } 
    }
}
</script>


<style lang="scss" scoped>
.page-link{
    cursor: pointer;
}
.active{
    & span{
        cursor: default;
    }
}
</style>