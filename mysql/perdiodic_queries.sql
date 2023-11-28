

-- -- This might be too late for your work, but here is how I did it. I want 
-- something run everyday at 1AM - I believe this is similar to what you are 
-- doing. Here is how I did it:

CREATE EVENT event_name
  ON SCHEDULE
    EVERY 1 DAY
    STARTS (TIMESTAMP(CURRENT_DATE) + INTERVAL 1 DAY + INTERVAL 1 HOUR)
  DO
    # Your awesome query

