import axios from "axios";

export default async function sendFormSignUp(name, email, password) {
  const formData = new FormData();
  formData.append("name", name.trim());
  formData.append("email", email.toLowerCase().trim())
  formData.append("password", password);

  const config = {
    headers: {
      "Content-Type": "multipart/form-data",
    },
  }

  try {
    const response = await axios.post('/api/controllers/signup.php', formData, config);
    return response;
  } catch (error) {
    alert('Ошибка, попробуйте позже');
    console.log(error);
  }
}