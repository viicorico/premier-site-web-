// Fonction pour afficher ou cacher le stock
function toggleStockVisibility() {
    var stockElements = document.querySelectorAll('.stock-amount');
    stockElements.forEach(function(element) {
        if (element.style.display === 'none') {
            element.style.display = 'table-cell';
        } else {
            element.style.display = 'none';
        }
    });
}

// Fonction pour ouvrir le modal avec l'image cliquée
function openModal(imageSrc) {
    var modal = document.getElementById('modal');
    var modalImage = document.getElementById('modal-image');
    modalImage.src = imageSrc;
    modal.style.display = 'block';
}

// Fonction pour fermer le modal
function closeModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
}

// Fonction pour changer la quantité d'un produit
function changeQuantite(action, button, index) {
    var quantityElement = document.getElementById('quantity-' + index);
    var currentQuantity = parseInt(quantityElement.textContent);
    var stockElement = document.querySelectorAll('.stock-amount')[index];

    var stockAmount = parseInt(stockElement.textContent);

    if (action === 'increase') {
        if (currentQuantity < stockAmount) {
            quantityElement.textContent = currentQuantity + 1;
        } else {
            alert("La quantité commandée ne peut pas dépasser le stock disponible.");
        }
    } else if (action === 'decrease' && currentQuantity > 0) {
        quantityElement.textContent = currentQuantity - 1;
    }
}
