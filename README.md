# Telemedi, zadanie z aplikacji na staż
## Instalacja 
Należy zlokalizować folder z którego uruchamiany jest `localhost`, np. `~/public_html`.
Poniżej używam `FOLDER` jako jego aliasu.
```
cd FOLDER
git clone https://github.com/TheMostMrGhost/telemedi.git
```
Otwarcie strony następuje po uruchomieniu w przeglądarce `localhost/telemedi/index.php`

## Problem
### Sformułowanie
Dostęp do wiedzy w obecnym świecie jest praktycznie nieograniczony, umożliwiając zdalne zgłębianie różnych dziedzin 
bez konieczności wychodzenia z domu. Wystarczy jedynie dostęp do internetu. Jednakże, istnieje znacząca różnica 
w porównaniu do tradycyjnych placówek edukacyjnych - brak osoby, która mogłaby narzucić tempo i zaplanować proces nauki. 
Chociaż możliwość indywidualnego wyboru tempa nauki jest korzystna, brak odpowiedniego przewodnictwa stanowi wyzwanie. 
Osoby zainteresowane samokształceniem często pytają na różnych forach internetowych, jednak odpowiedzi są 
zazwyczaj sporadyczne i nie uwzględniają indywidualnych preferencji użytkowników.

### Propozycja rozwiązania
Aby rozwiązać opisany problem, proponuję wykorzystanie narzędzi sztucznej inteligencji, w tym przypadku ChatGPT, 
aby umożliwić interaktywną rozmowę i stworzyć spersonalizowany plan nauki dla użytkowników. 
Proces ten polegałby na podzieleniu dziedziny zainteresowania na mniejsze segmenty, które zostałyby uporządkowane 
według stopnia zaawansowania. W ten sposób na każdym etapie nauki użytkownik zdobywałby potrzebne pojęcia, 
mając już wcześniejszą wiedzę (np. nie można uczyć się o "kernel trick" bez znajomości pojęć takich jak przestrzeń wektorowa czy iloczyn skalarny).

Dla każdego segmentu zaproponowane zostaną odpowiednie materiały do nauki i ćwiczeń, dostosowane do preferencji użytkownika. 
Na podstawie zebranych danych o dziedzinie zainteresowania i preferencjach użytkownika, zostanie opracowany szczegółowy plan nauki na najbliższe dni.

W celu usystematyzowania procesu, proponuję podzielić go na cztery etapy[^1]:

1. Ankieta wstępna: Zebranie danych od użytkownika dotyczących dziedziny zainteresowania i preferencji.
2. Plan długoterminowy: Opracowanie ogólnego planu nauki dziedziny, w formie punktowej, aby użytkownik wiedział, 
jakie elementy powinien opanować. Ten etap obejmuje jedynie ramowy plan bez uwzględnienia czasu.
3. Plan średnioterminowy: Wskazanie priorytetowych obszarów, na które użytkownik powinien się skupić w pierwszej kolejności. 
Przyjęto, że ten plan obejmuje 8 tygodni.
4. Plan krótkoterminowy: Szczegółowy plan nauki na najbliższe dni, precyzujący, jakie pojęcia lub rozdziały użytkownik 
powinien się uczyć. Domyślnie trwa on tydzień.

[^1]: W zastosowanej aplikacji może być inna liczba etapów, jednakże cel jest taki sam - uproszczenie interfejsu użytkownika. ↩

## Implementacja
W implementacji, ChatGPT jest wykorzystywany do generowania poszczególnych etapów planu. 
Aby zapewnić optymalne działanie, ChatGPT otrzymuje szablony odpowiedzi i jest uruchamiany w kontekście "nauczyciela i opiekuna". 
Po zebraniu wstępnych informacji od użytkownika, ChatGPT proponuje przykładowy plan nauki.

Na każdym etapie użytkownik ma możliwość przesłania korekty lub poproszenia o ponowne wygenerowanie odpowiedzi.

Przykładowe rozwiązania są prezentowane na podstawie przeprowadzonych próbnych rozmów, które dotyczyły nauki 
uczenia maszynowego dla początkujących z dobrą znajomością matematyki.

Implementacja oparta jest na podejściu obiektowym, z zastosowaniem szablonów stron i łatwą 
możliwością modyfikacji poszczególnych elementów.



### Wydajność
Aby zwiększyć wydajność, można zastosować kilka optymalizacji. Jednym z możliwych rozwiązań jest 
wprowadzenie bazy danych zawierającej popularne zapytania i odpowiedzi. Zamiast generować odpowiedź za każdym razem, 
można najpierw przeszukać bazę danych w celu znalezienia podobnych zapytań. Wyszukiwanie oparte na tagach 
można zrealizować przy użyciu mapy haszującej lub drzewa, takiego jak zmodyfikowane drzewo Trie lub drzewo Splay.



### Bezpieczeństwo
Proponowane rozwiązanie nie dotyczy obszarów krytycznych dla życia i zdrowia ludzi, ale ma służyć jako rodzaj doradcy. 
W związku z tym, nie stanowi ono realnego zagrożenia. Jeśli użytkownik uważa, że zaproponowana ścieżka rozwoju 
jest nieodpowiednia, może ją zignorować lub zmienić według własnego uznania.

Głównym potencjalnym zagrożeniem może być obecność wadliwych lub źle zaklasyfikowanych linków do stron edukacyjnych. 
Minimalizacja tego zagrożenia może być osiągnięta poprzez zastosowanie dedykowanego modułu, 
wykorzystującego sztuczną inteligencję lub rozwiązania oparte na algorytmach. Jednakże, w przypadku polecanych 
przez użytkowników stron edukacyjnych, zagrożenie to powinno być niewielkie.

Oprócz kwestii związanych z bezpieczeństwem samego AI, należy również zadbać o bezpieczeństwo strony internetowej 
poprzez oczyszczanie danych wejściowych, szyfrowanie danych oraz ochronę prywatności użytkowników, zwłaszcza jeśli 
aplikacja będzie posiadała funkcjonalność kont użytkowników.



## Rozbudowa
Projekt można znacząco rozbudować, wprowadzając dodatkowe funkcjonalności. Oto kilka propozycji:
1. Śledzenie postępów użytkownika: Można dodać mechanizm śledzenia postępów w nauce, który będzie monitorował, 
które sekcje zostały ukończone, a które jeszcze nie. Można również pokazywać użytkownikowi statystyki dotyczące 
czasu spędzonego na nauce poszczególnych tematów, liczby zaliczonych ćwiczeń itp.

2. Generowanie kolejnych etapów planu nauki: Po ukończeniu jednego etapu, można automatycznie generować 
kolejne etapy planu nauki, dostosowane do postępów i preferencji użytkownika. Można również uwzględnić sugestie 
lub pomysły użytkownika dotyczące konkretnych tematów do nauki.

3. Profil naukowy użytkownika: Po zalogowaniu użytkownik może mieć dostęp do pełnego "profilu naukowego", 
który zawierałby informacje o preferencjach, zainteresowaniach, ukończonych sekcjach, wynikach testów itp. 
Dzięki temu użytkownik może mieć spersonalizowane doświadczenie nauki i rekomendacje.

4. Rozbudowa projektu może być realizowana w oparciu o interakcję z użytkownikiem i jego feedback. 
Dzięki temu można stale udoskonalać doświadczenie edukacyjne i dostosowywać je do indywidualnych potrzeb i preferencji użytkowników.


## Dokumentacja checklist
- [X] base.php 
- [X] index\_page.php
- [X] load\_long\_term\_plan.php
- [X] load\_short\_term\_plan.php
- [X] reload.php
- [X] subpage.php
- [X] content.php
- [X] index.php
- [X] load\_middle\_term\_plan.php
- [X] plain\_main.php
- [X] sphinx.php
- [X] summary\_page.php
- [X] displayer.php
- [X] load\_initial\_questions.php
- [X] summary.php





###### Autor: Mikołaj Duch
