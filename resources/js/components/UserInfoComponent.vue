<template>
    <div>


        <div class="flex justify-center">
            <div class="w-11/12 md:w-8/12 lg:w-7/12 bg-white lg:p-20 rounded-lg">
                <div class="overflow-hidden overflow-x-auto w-full align-middle sm:rounded-md">


                </div>
                <div class="p-4">
                    <h1 class="font-light">Ime in priimek: <b class="font-bold text-lg">{{ userData['name'] }} {{ userData['surname'] }}</b></h1>
                    <h1 class="font-light">Email: <b class="font-bold text-lg">{{ userData['email'] }} </b></h1>
                    <h1 class="font-light">Razred: <b class="font-bold text-lg">{{ userData['class'] }}</b></h1>
                </div>
                <div class="accordion" id="accordionExample" >
                    <div class="accordion-item bg-white border border-gray-200"
                         v-for="item in category"
                         :key="item.id">

                        <h2 class="accordion-header mb-0" :id="['#index' + item.id ]">

                            <button class="
                            accordion-button
                            collapsed
                            relative
                            flex
                            items-center
                            w-full
                            py-lg-4
                            px-lg-5
                            text-base text-gray-800 text-left
                            bg-white
                            border-0
                            rounded-none
                            transition
                            focus:outline-none
                            text-xs
                            md:text-base"
                                @click="changeIndex(item.id), getKategorija(index)"
                                type="button" data-bs-toggle="collapse" v-bind:data-bs-target="['#index' + item.id ]" aria-expanded="false"
                                :aria-controls="['#index' + item.id ]">
                            {{ item.category_name }}
                        </button>
                    </h2>
                    <div :id="['index'+ item.id]" class="accordion-collapse collapse" :aria-labelledby="['#index' + item.id ]"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body md:py-4 md:px-5">

                            <table class="w-full border divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50"><span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                                            Privolitev</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50">
                                            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                                                izbira</span>
                                        </th>
                                    </tr>
                                    </thead>

                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    <tr class="bg-white"  v-for="(permission, key) in category[index]['permissions']"
                                        :key="permission.id">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ permission.permission_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <span v-if=" choice[key] == true" class="bg-green-100 text-green-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">DA</span>
                                            <span v-if=" choice[key] == false" class="bg-red-100 text-red-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">NE</span>
                                            <span v-if=" choice[key] == null" class="text-center bg-yellow-100 text-yellow-800 text-xs font-semibold  px-0.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">NI DOLOČENO</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { onMounted } from "vue";
import { ref } from 'vue'
import axios from 'axios';
import axiosClient from "../axios/axios";




export default {


    data () {
        return {
            count: 11,  //11 je število vseh kategorij
            index: 1,   //števec za pomikanje po kategorijah
            categoryIndex: 0,
            choice: [],
            ID: null,
            userData: [],
            contract_status:null,
        };
    },


    setup(){
        const category = ref('')


        const loadData = async () =>{
            try{
                const response = await axios.get('/contract_questions')

                category.value = response.data.data.category;


            } catch (err){
                console.log(err)
            }
        }
        loadData()

        return {
            category,

        }
    },

    methods:{

        changeIndex(key){

            this.categoryIndex = key
            this.index = key - 1

        },

        getKategorija(index){
            if (this.choice.length != 0){
                this.choice = []

            };
            this.contract_status.forEach((permission) => {
                if(permission.category_id == this.categoryIndex){
                    console.log(permission.choice);
                    this.choice.push(permission.choice)
                };

            });

        },

    },


    created() {
        this.ID = this.$attrs.userid

        axios.get(`/contract_status/${this.ID}`,{
            headers: {
                'Content-Type': 'aplication/json',
                'Accept' : 'aplication/json',
                'app-token' : 'base64:VYfyAbTkMgHOZ68zh0W8baEEzCW49ZQHc4fev9fgy08=',
            },
        }).then((response) => {
            this.contract_status = response.data.data.user[0].contract_status
            this.userData = response.data.data.user[0]
        })
    },


}
</script>






