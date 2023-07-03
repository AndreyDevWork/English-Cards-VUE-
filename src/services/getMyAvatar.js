import axios from "axios";

export default async function getMyAvatar() {
  try {
    const response = await axios.get('/api/controllers/getMyAvatar.php');
    console.log(response)
    return response.data;
  } catch (error) {
    alert('Ошибка, попробуйте позже');
    console.log(error);
  }
}