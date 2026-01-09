<template>
    <AuthHeader />
    <main>
        <div class="register-form">
            <form @submit.prevent="submit">
            <h3>新規登録</h3>
                <div class="form-text">
                    <input type="text" v-model="name" placeholder="ユーザーネーム">
                    <p class="error"><!--※ エラー表示予定--></p>
                </div>
                <div class="form-text">
                    <input type="email" v-model="email" placeholder="メールアドレス">
                    <p class="error"><!--※ エラー表示予定--></p>
                </div>
                <div class="form-text">
                    <input type="password" v-model="password" placeholder="パスワード">
                    <p class="error"><!--※ エラー表示予定--></p>
                </div>
                <button class="form-button">新規登録</button>
            </form>
        </div>
    </main>
</template>

<script setup>
import '~/assets/css/register.css'
import { ref } from 'vue'

const name = ref('')
const email = ref('')
const password = ref('')

const submit = () => {
    console.log(name.value,email.value,password.value)
}
</script>