<template>
    <AuthHeader />
    <main>
        <div class="register-form">
            <form @submit.prevent="submit" novalidate>
            <h3>新規登録</h3>
                <div class="form-text">
                    <input type="text" v-model="name" placeholder="ユーザーネーム">
                    <p v-if="errors.name"
                    class="errors">{{ errors.name }}</p>
                </div>
                <div class="form-text">
                    <input type="email" v-model="email" placeholder="メールアドレス">
                    <p v-if="errors.email" class="errors">{{ errors.email }}</p>
                </div>
                <div class="form-text">
                    <input type="password" v-model="password" placeholder="パスワード">
                    <p v-if="errors.password" class="errors">{{ errors.password }}</p>
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
import { useForm } from 'vee-validate'

const { defineField, handleSubmit, errors } = useForm({
    validationSchema: {
        name: (value) => {
            if (!value) {
                return 'ユーザーネームを入力してください'
            }
            if (value.length > 20) {
                return 'ユーザーネームは20文字以下で入力してください'
            }
            return true
        },

        email: (value) => {
            if (!value) {
                return 'メールアドレスを入力してください'
            }
            if (!value.includes('@')) {
                return 'メールアドレスの形式で入力してください'
            }
            return true
        },

        password: (value) => {
            console.log('パスワード:', value)

            if (!value) {
                return'パスワードを入力してください'
            }

            console.log('文字数:', value.length)
            if (value.length < 6) {
                return'パスワードは6文字以上で入力してください'
            }
            return true
        }
    }
})

const [name] = defineField('name')
const [email] = defineField('email')
const [password] = defineField('password')

const submit = handleSubmit(async () => {
console.log('① submit押された')
console.log('emailそのまま:', email.value)
console.log('email長さ:', email.value.length)
console.log('email JSON:', JSON.stringify(email.value))

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

    await navigateTo('/login')

} catch (error) {
    console.log('④ APIエラー', error)

    if (error?.data?.errors) {
    errors.value = error.data.errors
    }
}
},

() => {
        console.log('バリデーションNG')
    }

)
</script>
