
---

## ⚙️ Fonctionnement global

Le fichier `index.php` charge une liste de commandes à traiter.

Chaque commande passe par plusieurs étapes :

### 1. 🔍 Validation (Chain of Responsibility)
Tous les validateurs héritent d’`AbstractValidator` et sont chaînés. Si un maillon échoue, la validation s’arrête :
- Email valide
- Présence des articles
- Adresse de livraison
- Méthode de paiement reconnue
- Méthode de livraison
- Remise valide (optionnelle)

### 2. 💰 Calcul du total
Le total est calculé en fonction des produits (prix x quantité).

### 3. 🎫 Remises
Si un code promo est valide (`WELCOME10`, `STUDENT20`), le total est réduit.

### 4. 💳 Paiement (Strategy + Factory)
Le `PaymentStrategyFactory` retourne l’objet correspondant à la méthode de paiement :
- `credit_card` → `CreditCardPayment`
- `paypal` → `PayPalPayment`
- `bank_transfer` → `BankTransferPayment`

Chacune applique sa propre logique via `PaymentStrategyInterface`.

### 5. 📦 Livraison
En fonction de `shipping_method`, on simule une livraison :
- `express`, `standard` ou `pickup`

### 6. 📧 Notifications (Observer)
Un `OrderNotifier` notifie tous les `Observer` attachés :
- Email
- SMS
- Notification push

### 7. 💾 Sauvegarde
Simulation d’un enregistrement de la commande traitée.

---

## 🧠 Design Patterns utilisés

| Pattern                    | Utilisation                                         |
|---------------------------|-----------------------------------------------------|
| Chain of Responsibility   | Pour valider dynamiquement les champs d'une commande |
| Strategy                  | Pour encapsuler chaque mode de paiement             |
| Factory Method            | Pour instancier dynamiquement la stratégie de paiement |
| Observer                  | Pour notifier plusieurs canaux (email, sms...)      |

---

## ▶️ Lancer le projet

```bash
php index.php
