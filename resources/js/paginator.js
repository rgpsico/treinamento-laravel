class Paginator {
    constructor(data, pageSize, currentPage) {
      this.data = data;
      this.pageSize = pageSize;
      this.currentPage = currentPage;
    }
  
    getData() {
      const startIndex = (this.currentPage - 1) * this.pageSize;
      const endIndex = startIndex + this.pageSize;
      return this.data.slice(startIndex, endIndex);
    }
  
    getPageCount() {
      return Math.ceil(this.data.length / this.pageSize);
    }
  
    setCurrentPage(page) {
      if (page < 1 || page > this.getPageCount()) {
        throw new Error('Página inválida');
      }
      this.currentPage = page;
    }
  
    nextPage() {
      if (this.currentPage < this.getPageCount()) {
        this.currentPage++;
      }
    }
  
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    }
  }
  
  export default Paginator;
  