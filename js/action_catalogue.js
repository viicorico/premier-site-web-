function changeQuantite(action, element, productId) {
    const quantitySpan = document.getElementById(`quantity-${productId}`);
    let quantity = parseInt(quantitySpan.textContent);
    const stock = parseInt(element.closest('tr').querySelector('.stock-amount').textContent);
  
    if (action === 'increase' && quantity < stock) {
      quantity++;
    } else if (action === 'decrease' && quantity > 0) {
      quantity--;
    }
    quantitySpan.textContent = quantity;
  }
  
  function toggleStockVisibility() {
    const stockColumns = document.querySelectorAll('.stock-amount');
    stockColumns.forEach(column => {
      column.style.display = column.style.display === 'none' ? '' : 'none';
    });
  }

  function openModal(imageSrc) {
    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modal-image');
    modalImage.src = imageSrc;
    modal.style.display = 'block';
  }
  
  function closeModal() {
    document.getElementById('modal').style.display = 'none';
  }