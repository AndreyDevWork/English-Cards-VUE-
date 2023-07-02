import axios from "axios";

export default async function sendFormLogin(email, password) {
  const formData = new FormData
  formData.append("email", email.toLowerCase().trim())
  formData.append("password", password)

  const config = {
    header: {
      "Content-Type": "multipart/form-data",
    },
  }

  try {
    const response = await axios.post('http://englishcards/api/controllers/login.php', formData, config);
    return response;
  } catch (error) {
    alert('Ошибка, попробуйте позже');
    console.log(error);
  }
}