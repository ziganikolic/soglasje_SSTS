<!--!!!Nujno potrebni loaderji https://stackoverflow.com/questions/68415731/vue-js-remember-check-box-choices-for-every-question-->
<template>
    <!--loader NUJNO!!!!-->

<div>
    <div class="flex justify-center">
        <div class="w-11/12 md:w-8/12 lg:w-7/12 bg-white rounded-lg">
            <div class="p-lg-5 p-3">

            <div class="text-center" v-if="start == true && end == false">
                <h1 class="  text-4xl md:text-4xl xl:text-4xl font-bold tracking-tight mb-12">Za pričetek reševanja soglasja <br> klikni na gumb:</h1>

                <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full text-xl" @click="this.start = false" >Začni</button>
            </div>

            <div v-if="start == false && end == false" >
                <div class="flex justify-between mb-3" >
                    <h1 class="flex items-center font-black text-sm">
                        {{ category[index]['category_name'] }}
                    </h1>
                    <!-- <h1 class="flex  items-center pl-5">PRIVOLIM</h1>      SAMO NA PC (velikost zaslona)  -->
                </div>
                <ul class="list-disc" v-for="(permission, key) in category[index]['permissions']"
                    :key="permission.id">

                    <li class="flex justify-between pb-2"     >
                        <label class="max-w-lg text-xs w-10/12" :for="permission.permission_name">{{ permission.permission_name }}</label>
                        <input
                            class="field w-6 h-6 xl:w-8 xl:h-8 xl:ml-5"
                            type="checkbox"
                            v-model="checkedAnswers[key]"
                            @change="answerClick(key)"
                            :id="permission.id"
                        />
                    </li>
                </ul>
                <div class="mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                            type="submit"
                            v-show="index != 0"
                            @click="PrejsnjaStran(),chooseQuestion(index)"

                    >Nazaj</button>

                    <button class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                            type="submit"
                            v-show="index != 10"
                            @click="NaslednjaStran()"
                    >Naprej</button>


                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-right"
                            type="submit"
                            v-show="index == 10"
                            @click="sendForm(), this.end == true"
                    >Konec</button>
                </div>
            </div>
            <div class="text-center" v-if="this.end == true" >
                <h1 class="mb-12"></h1>
                <h2 class="text-green-600 text-2xl md:text-2xl xl:text-2xl font-bold tracking-tight">Soglasje je uspešno oddano</h2>
                <!--<h2 class="text-pink-700 text-2xl md:text-2xl xl:text-2xl font-bold tracking-tight">Soglasje ni oddano, prišlo je do napake</h2>-->
                <!--<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Pošlji ponovno</button>-->
            </div>
            </div>
        </div>
    </div>
</div>




</template>


<script>
import axios from 'axios';
import { ref } from 'vue'
import { onMounted } from "vue";
import axiosClient from '../axios/axios';


export default {

    //axios
    setup(){
        const category = ref('')


        const loadCategory = async () =>{
            try{
                const response = await axios.get('/contract_questions')
                category.value = response.data.data.category;

            } catch (err){
                consloe.log(err)
            }
        }
        loadCategory()

        return {
            category,

        }
    },

    props: ['user'],

    data () {
        return {
            count: 11,  //11 je število vseh kategorij
            index: 0,   //števec za pomikanje po kategorijah
            quizQuestions:[],
            checkedAnswers: null,
            questions: [],
            answers: [],
            start: true,
            end:false,
            start_checkbox1: true,
        };
    },


    methods: {
        sendForm (e) {
            axios.post('/contract_status',{
                text: this.quizQuestions,
                user_id: this.user.id

            },{
                headers: {
                    'Content-Type': 'aplication/json',
                    'Accept' : 'aplication/json',
                    'app-token' : 'base64:VYfyAbTkMgHOZ68zh0W8baEEzCW49ZQHc4fev9fgy08=',
                }

            }).then(function (response) {
                console.log('Response', response)
                if(response){
                    setTimeout(() => window.location.href = "/home" , 3000);
                }
            })
                .catch(function (err) {
                    console.log('Error', err)
                })

            this.end = true;
            this.start = false;
        },

        chooseQuestion(index) {
            this.index = index;
            this.checkedAnswers = this.answers[this.index] ? this.answers[this.index] : []; // set the checkedAnswers to what we can find in our mapping, if there is nothing to find use an empty array
        },

        answerClick(key){
            if (!this.answers[this.index]) this.answers[this.index] = [] // if the current question has no answers mapped yet set an empty array
            this.answers[this.index][key] = this.checkedAnswers[key]; // set the answer to whatever value it has currently (true, false)
        },


        NaslednjaStran(){
            this.index += 1;


            this.checkedAnswers = ["null","null","null","null","null","null"]; // set the checked answers for the next question

            if(this.index == 8){
                this.checkedAnswers = ["null"];
                this.quizQuestions[this.index] = (this.checkedAnswers)
            }else if(this.index == 9){
                this.checkedAnswers = ["null","null"]
                this.quizQuestions[this.index] = (this.checkedAnswers)
            }else if(this.index == 10){
                this.checkedAnswers = ["null","null","null","null"]
                this.quizQuestions[this.index] = (this.checkedAnswers)
            }

            console.log("next question")
// ({[this.index]:this.checkedAnswers})
            this.quizQuestions[this.index] = (this.checkedAnswers)
        },

        PrejsnjaStran(){
            this.index--
            this.checkedAnswers = []
        },

        created(){
            console.log(this.user.id)

        },
    },



    mounted() {
        this.checkedAnswers = ["null","null","null","null","null"]
        this.quizQuestions[this.index] = (this.checkedAnswers)

    },
};

</script>
