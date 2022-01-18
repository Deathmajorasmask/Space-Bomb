var Product = function(id, nickname, description, score) {
    this.id = 0;
    this.nickname = nickname;
    this.description = description;
    this.score = score;
};
Product.prototype = {
    setId: function(id) {
        this.id = id;
    },
    getHtml: function() {
        var html = "<div class='product'>";
        html += "<p>" + this.nickname + "</p>";
        html += "<p>" + this.description + "</p>";
        html += "<p>$" + this.score + "</p>";
        html += "<button class='btnDelete'>Borrar</button>";
        html += "</div>";
        return html;
    },
    isValid: function() {
        if (!this.nickname || !this.description || !this.score) return false;
        return true;
    }
};