<template>
    <AuthHeader />
    <main>
        <div class="login-form">
            <form @submit.prevent="submit">
            <h3 class="login-title">ログイン</h3>
                <div class="form-name">
                    <input type="email" v-model="email" placeholder="メールアドレス">
                    <p><!--※ エラー表示予定--></p>
                </div>
                <div class="form-password">
                    <input type="password" v-model="password" placeholder="パスワード">
                <p><!--※ エラー表示予定--></p>
                </div>
                <button class="form-button">ログイン</button>
            </form>
        </div>
    </main>
</template>

<script setup>
import '~/assets/css/login.css'
import { ref } from 'vue'

const email = ref('')
const password = ref('')

const submit = () => {
    console.log(email.value,password.value)
}
</script>