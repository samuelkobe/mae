var faqs = document.querySelectorAll(".faq-item");

for (var i = 0; i < faqs.length; i++) {
    faqs[i].addEventListener('click', function (e) {
        if (this.classList.contains('open')) {
            this.classList.remove('open');
        } else {
            this.classList.add('open');
            for (let sibling of this.parentNode.children) {
                if (sibling !== this) sibling.classList.remove('open');
            }
        }

    });
}