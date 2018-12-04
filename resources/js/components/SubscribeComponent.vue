<template>
    <div>

        <form class="form-inline my-2 my-lg-0" method="POST" id="subscribeForm">

            <label for="email"></label><input class="form-control mr-sm-2"
                                              type="email" name="email"
                                              :placeholder="placeholderValue"
                                              id="email"
                                              v-model="email"
                                              aria-label="email">
            <button @click.prevent="subscribe" class="btn btn-dark my-2 my-sm-0" type="submit">Подписаться</button>

        </form>

     </div>
  </template>

  <script>
      export default {
             data: function() {
              return {
                  placeholderValue: 'example@mail.com',
                  email: "",
                  token: '{{ csrf_token() }}',
              }
          },

          mounted() {
          },
          methods: {
                 subscribe: function () {
                     var otvet;
                     if (!this.email){
                         alert('Укажите email');
                         return true;
                     } else if (!this.validMail(this.email)){
                         alert('Укажите корректный адрес электронной почты.');
                         return true;
                     }
                     axios.post('subscribe', {email: this.email})
                         .then(response => {
                             otvet = response.data.subResult;
                             alert(otvet);
                         } );
                     this.email= '';

                 },

              validMail: function (email) {
                  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                  return re.test(email);
              }
          },
      }
  </script>

