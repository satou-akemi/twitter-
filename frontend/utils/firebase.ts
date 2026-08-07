import { initializeApp } from 'firebase/app'
import { getAuth } from 'firebase/auth'

const firebaseConfig = {
  apiKey: "AIzaSyCNJ_YsFAbzHeLZZArjsnlkGkp0gsDLrrg",
  authDomain: "twitter-96ba7.firebaseapp.com",
  projectId: "twitter-96ba7",
}

const app = initializeApp(firebaseConfig)

export const auth = getAuth(app)
