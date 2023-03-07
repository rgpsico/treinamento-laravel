class API {
    constructor(url) {
      this.url = url;
    }
  
    async getList(params) {
      const url = new URL(this.url);
      Object.keys(params).forEach((key) =>
        url.searchParams.append(key, params[key])
      );
      const response = await fetch(url);
      if (!response.ok) {
        throw new Error('Erro ao buscar dados');
      }
      return response.json();
    }
  }
  
  export default API;
  