<template>
    <div>
        <table class="table table-hover" >
            <thead>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>Закоголовк новости</th>
                <th >Действие</th>
            </tr>
            </thead>

            <tbody >
            <tr v-for="(news, index) in allNews">
                <th scope="row">{{index+1}}</th>
                <td><span >{{ news.id}}</span></td>
                <td><span >{{news.title }}</span></td>

                <td >
                    <button class="btn btn-info" @click="editNews(news.id)" >Редактировать</button>
                    <button class="btn btn-danger" @click="destroyNews(news.id)">Удалить</button>
                </td>
            </tr>
           <!-- <p>Нет новостей</p>-->
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: [
        ],
        data: function() {
            return {
                allNews: [],
                flag: false,
            }
        },
        mounted() {
            this.getNews();
        },
        methods: {

            editNews: function (id) {
                window.location = '/admin/' + id + '/edit';
            },

            destroyNews: function (id) {
                var r=confirm("Вы уверенны что хотите удалить эту новость?");
                if (r===true)
                {
                    axios.post('destroy', {id: id}).then(response =>{
                        this.allNews = response.data;
                    });
                }

            },

            getNews: function () {
                axios.get ('getNews').
                then(response => {
                    this.allNews = response.data;
                });
            },

        }

    }
</script>

