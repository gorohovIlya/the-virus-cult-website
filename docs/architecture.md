# Архитектура проекта

## 1. Обзор

Проект построен на архитектуре "Чистая архитектура" (Clean Architecture) с выделением доменного слоя в отдельный пакет.

```mermaid
graph TB
    subgraph "Presentation Layer"
        Web[Web Controllers]
    end
    
    subgraph "Application Layer"
        App[Application Services]
    end
    
    subgraph "Domain Layer (Core Package)"
        Domain[Domain Entities]
        Services[Domain Services]
        Repos[Repository Interfaces]
    end
    
    subgraph "Infrastructure Layer"
        Eloquent[Eloquent ORM]
        DB[(MySQL)]
    end
    
    Web --> App
    App --> Domain
    Domain --> Repos
    Repos --> Eloquent
    Eloquent --> DB