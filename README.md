# TravelMan

This solution tries to solve the Traveling Salesman Problem (TSP) with a fixed starting point.
It comes with an executable file in the base folder called solve.php as requested.
It will read the available cities (or nodes) from a file called cities.txt in the same root folder.
### Usage

php solve.php [verbose]

### Considerations to the algorithm election

The problem consisted in guessing the shortest route between ALL cities present in a provided tab delimited file (cities.txt), under 15min execution time.
This can be solved by a bruteforce approach for a small list of nodes, but since it is a NP-hard problem, for more than 10 nodes 
the needed time starts being n-exponential.

There is not an optimal solution with polynomial complexity for this, but there are a few algorithms that yield less than optimal results.

For developing this test, I first used a bruteforce approach, but it would not work for the amount of cities provided, under the timelimit.
So i decided to create an algorithm interface structure so I could keep trying new ones.

I then tried with Dijkstra, knowing that even though Dijkstra solves the shortest path, I could maybe try and refactor it to visit all nodes as a requirement. I desisted because I did not see it possible.

I then found a library on github with a genetic algorithm approach, one of the many heuristic approximations to the TSP problem.
https://github.com/wdalmut/tsp-genetic-algorithm
I wrapped the library with my interfaced class and got really fast but variable and with less than optimal results.

Then I re-read the information available online about the TSP, and saw that a Branch and bound algorithm works well up to a 
certain amount of nodes.
https://en.wikipedia.org/wiki/Travelling_salesman_problem

So I found an implementation of the algorithm in PHP here:
http://www.srimax.com/index.php/travelling-salesman-problem-using-branch-bound-approach-php/
I wrapped it in my algorithm interface, et voilà.

### Other Considerations
I also wrote an input interface for code simplicity and especially testability. With this interface, the input can be mocked 
with stubs and it does not depend on filesystem.