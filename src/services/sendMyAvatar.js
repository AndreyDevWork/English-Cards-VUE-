import axios from "axios";

export default async function sendMyAvatar(file) {
  const formData = new FormData();
  formData.append("avatar", file);
  
  const config = {
    headers: {
      "Content-Type": "multipart/form-data",
    },
  }

  try {
    const response = await axios.post('/api/controllers/uploadAvatar.php', formData, config);
    return response;
  } catch (error) {
    alert('Ошибка, попробуйте позже');
    console.log(error);
  }
}