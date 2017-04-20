# Exercise - Cached

1.	In **CalcOrderTotalForShipper** add to the **Run** method two parameters type **NumberColumn**:  
    1.  pTotalOrders.
    2.  pTotalFreightValue. 
2.  In the **Run** method  **after** the **Execute** update the two parameters with local variables value. (remember to use **.Value** for the NumberColumns)
3.  In **ShowShippers**.
4.  Override the **OnEnterRow**.
5.  Add a call to **CalcOrderTotalForShipper**. (use the **run** snippet)
6.  Remember to send the **ShipperID** and the **two local columns** to **CalcOrderTotalForShipper**.
7.  Build and test.

