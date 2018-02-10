<template>
    <div>
        <a v-if="create" :href="create">Create</a>

        <div class="form-inline">
            <a href=""></a>
            <div class="form-group pull-right">
                <input type="search" placeholder="search" v-model="filter" class="form-control">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="title-table" @click="toggleOrdem(index)" v-for="(title, index) in titles" :key="index">{{title}}</th>
                    <th v-if="details || edit || deletes">Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(item, index) in list" :key="index">
                    <td  v-for="(i, index) in item" :key="index">{{i}}</td>
                    
                    <form :id="index" v-if="deletes && token" :action="deletes" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" :value="token">
                        
                        <a v-if="details" :href="details">Details |</a>
                        <a v-if="edit" :href="edit">Edit |</a>
                        <a v-if="deletes" :href="deletes">Delete</a>
                        <a href="" @click="initForm(index)"></a>
                    </form>

                    <span v-if="!token">
                        <a v-if="details" :href="details">Details |</a>
                        <a v-if="edit" :href="edit"> Edit</a>
                        <a v-if="deletes" :href="deletes">Delete</a>
                    </span>

                    <span v-if="token && !deletes">
                        <a v-if="details" :href="details">Details |</a>
                        <a v-if="edit" :href="edit"> Edit</a>
                    </span>
                </tr>
                
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: ['titles', 'items', 'create', 'details', 'edit', 'deletes', 'token'],
        
        data () {
            return {
                filter: '',
                ordem: 'decs',
                ordemCol: 0
            }
        },
        computed: {
            list () {

                this.ordem = this.ordem.toLowerCase()
                this.ordemCol = parseInt(this.ordemCol)

                if (this.ordem === "asc") {
                    this.items.sort((a, b) => {
                        if (a[this.ordemCol] < b[this.ordemCol]) { return 1}
                        if (a[this.ordemCol] > b[this.ordemCol]) { return -1}
                        return 0
                    }) 
                } else {
                    this.items.sort((a, b) => {
                        if (a[this.ordemCol] > b[this.ordemCol]) { return 1}
                        if (a[this.ordemCol] < b[this.ordemCol]) { return -1}
                        return 0
                    })
                }


                return this.items.filter(res => {
                    for(let i = 0; i < res.length; i++) {
                        if ((res[i] + "").toLowerCase().indexOf(this.filter.toLowerCase()) >= 0) {
                            return true
                        }
                    }
                    return false
                })  

                
            }
        },
        methods: {
            initForm (index) {
                document.getElementById(index).submit()
            },
            toggleOrdem (index) {
                this.ordem = this.ordem === 'desc'
                    ? 'asc' : 'desc'
                this.ordemCol = index
            }
        }
    }

</script>

<style lang="scss" scoped>
    .title-table {
        cursor: pointer;
    }
</style>
