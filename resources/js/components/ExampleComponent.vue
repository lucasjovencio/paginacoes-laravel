<template>
    <div class="container">
        <div class="card">
            <div class="card-header">DataTable Vue</div>
            <div class="card-body">
                <data-table
                    :url="url"
                    :per-page="perPage"
                    :columns="columns"
                    :pagination="pagination"
                    :add-filters-to-url="false"
                    :filters="filters"
                >
                    <span slot="filters" slot-scope="{ tableData, perPage }">
                        <datatable-filters
                            :table-data="tableData"
                            :per-page="perPage">
                        </datatable-filters>
                    </span>
                </data-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                perPage: ['10', '25', '50'],
                columns: [
                    {
                        label: 'Name',
                        name: 'name',
                        filterable: true,
                    },
                    {
                        label: 'Status',
                        name: 'status_txt',
                        filterable: false,
                    },
                    {
                        label: 'Tipo',
                        name: 'tipo',
                        filterable: false,
                    },
                    {
                        label: 'Idade',
                        name: 'idade',
                        filterable: false,
                    },
                    {
                        label: 'Gênero',
                        name: 'genero',
                        filterable: false,
                    },
                ],
                url:"http://localhost/paginacoes-laravel/public/datatable/vue/ajax",
                pagination:{
                    limit: 3,
                    align: "right",
                    size: "small"
                },
            }
        },
        components: {
        }
    }
</script>
