# TravelMan

This solution tries to solve the Traveling Salesman Problem (TSP) with a fixed starting point.
It comes with an executable file in the base folder called solve.php as requested.
It will read the available cities (or nodes) from a file called cities.txt in the same root folder.
### Usage

php solve.php

### Considerations

The problem consisted in guessing the shortest route between ALL cities present in a provided tab delimited file (cities.txt), under 15min execution time.
This can be solved by a bruteforce approach for a small list of nodes, but since it is a NP-hard problem, for more than 10 nodes 
the needed time starts being n-exponential.

https://en.wikipedia.org/wiki/Travelling_salesman_problem

There is not an optimal solution with polynomial complexity for this, but there are a few algorithms that yield less than optimal results.

For developing this test, I first used a bruteforce approach, but it would not work for the amount of cities provided, under the timelimit.
So i decided to create an algorithm interface structure so I could keep trying new ones.

I then tried with Dijkstra, knowing that even though Dijkstra solves the shortest path, I could maybe try and refactor it to visit all nodes as a requirement. I could not make it.

So finally, I found a library on github with a genetic algorithm approach to the TSP problem.
https://github.com/wdalmut/tsp-genetic-algorithm
I wrapped the library with my interfaced class and got really fast but variable and with less than optimal results.


