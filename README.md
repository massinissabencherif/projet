# Mamazon

## Consignes générales

Vous devez refactoriser l'application console PHP fournie en appliquant les design patterns et principes SOLID vus en cours.
L'application est un système de gestion de commandes e-commerce fonctionnel mais mal conçu. Vous devez l'améliorer en 4 étapes progressives de refactorisation.

> Important : L'application doit rester fonctionnelle à chaque étape !

## Étapes de refactorisation

### Étape 1 : Chain of Responsibility pour la validation (5 points)

Refactorisez en utilisant le pattern Chain of Responsibility pour créer une chaîne de validateurs.

### Étape 2 : Strategy pour les paiements (5 points)

Refactorisez en utilisant le pattern Strategy pour les méthodes de paiement.

### Étape 3 : Factory Method pour les livraisons (5 points)

Refactorisez en utilisant le pattern Factory Method pour la création des services de livraison.

### Étape 4 : Observer pour les notifications (5 points)

Refactorisez en utilisant le pattern Observer pour découpler les notifications.

## Critères d'évaluation

### Fonctionnalité (5 points)

L'application console fonctionne correctement après chaque étape
La sortie console reste cohérente et lisible.
Aucune régression fonctionnelle

### Respect des Design Patterns (10 points)

- Chain of Responsibility : correctement implémenté (2,5 pts)
- Strategy : correctement implémenté (2,5 pts)
- Factory Method : correctement implémenté (2,5 pts)
- Observer : correctement implémenté (2,5 pts)

### Principes SOLID (5 points)

- SRP : chaque classe a une responsabilité unique
- OCP : ouvert à l'extension, fermé à la modification
- DIP : dépendance aux abstractions, pas aux concrétions
- DRY : pas de duplication de code
Lisibilité : code clair et bien structuré
