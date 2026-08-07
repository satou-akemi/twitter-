<template>
    <AuthHeader />
    <main>
        <div class="register-form">
            <form @submit.prevent="submit">
            <h3>新規登録</h3>
                <div class="form-text">
                    <input type="text" v-model="name" placeholder="ユーザーネーム">
                    <p v-if="errors.name">{{ errors.name[0] }}</p>
                </div>
                <div class="form-text">
                    <input type="email" v-model="email" placeholder="メールアドレス">
                    <p v-if="errors.email" class="errors">{{ errors.email[0] }}</p>
                </div>
                <div class="form-text">
                    <input type="password" v-model="password" placeholder="パスワード">
                    <p v-if="errors.password" class="errors">{{ errors.password[0] }}</p>
                </div>
                <button type="submit" class="form-button">新規登録</button>
            </form>
        </div>
    </main>
</template>

<script setup>
import '~/assets/css/register.css'
import { ref } from 'vue'
import {createUserWithEmailAndPassword } from 'firebase/auth'
import { auth } from '../../utils/firebase'

const name = ref('')
const email = ref('')
const password = ref('')
const errors = ref({})

const submit = async () => {
  console.log('① submit押された')
  console.log('emailそのまま:', email.value)
  console.log('email長さ:', email.value.length)
  console.log('email JSON:', JSON.stringify(email.value))

  errors.value = {}


errors.value = {}

try {
    await createUserWithEmailAndPassword(auth, email.value, password.value)

    const res = await $fetch('http://localhost/api/register', {
    method: 'POST',
    body: {
        name: name.value,
        email: email.value,
        password: password.value,
    },
    })

    console.log('③ API成功', res)

} catch (error) {
    console.log('④ APIエラー', error)

    if (error?.data?.errors) {
    errors.value = error.data.errors
    }
}
}
</script>
